-- Installation metadata
CREATE TABLE IF NOT EXISTS schema_meta (
	version TEXT NOT NULL PRIMARY KEY,
	created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	comments TEXT
);

CREATE TABLE IF NOT EXISTS maintenance_meta (
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	settings TEXT NOT NULL DEFAULT '{}'
);
CREATE INDEX idx_maintenance_updated ON maintenance_meta ( updated_at );

CREATE TRIGGER maintenance_meta_update AFTER UPDATE ON maintenance_meta FOR EACH ROW
WHEN OLD.updated_at = NEW.updated_at
BEGIN
	UPDATE maintenance_meta SET updated_at = CURRENT_TIMESTAMP
		WHERE id = NEW.id;
END;

-- Post content
CREATE TABLE posts(
	id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, 
	post_path TEXT NOT NULL COLLATE NOCASE,
	post_view TEXT NOT NULL COLLATE NOCASE,
	post_content TEXT NOT NULL COLLATE NOCASE, 
	post_summary TEXT DEFAULT '' COLLATE NOCASE, 
	post_type TEXT DEFAULT '' COLLATE NOCASE, 
	updated DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
	published DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);-- --
CREATE INDEX idx_post_updated ON posts( updated DESC );-- --
CREATE INDEX idx_post_published ON posts( published DESC );-- --
CREATE UNIQUE INDEX idx_post_path ON posts( post_path );-- --

-- Tag tables
CREATE TABLE tags (
	id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, 
	slug TEXT NOT NULL COLLATE NOCASE, 
	term TEXT NOT NULL COLLATE NOCASE,
	post_count INTEGER NOT NULL DEFAULT 0
);-- --
CREATE UNIQUE INDEX idx_tag_slug ON tags( slug ASC );-- --

CREATE TABLE post_tags(
	id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, 
	post_id INTEGER NOT NULL REFERENCES posts( id ) 
		ON DELETE CASCADE,
	tag_slug TEXT NOT NULL COLLATE NOCASE
);-- --
CREATE INDEX idx_post_tags_id ON post_tags( post_id );-- --
CREATE INDEX idx_post_tags_slug ON post_tags( tag_slug );-- --
CREATE UNIQUE INDEX idx_post_tags ON post_tags( post_id, tag_slug );-- --

-- Tag triggers
CREATE TRIGGER tag_after_insert AFTER INSERT ON post_tags FOR EACH ROW 
BEGIN
	UPDATE tags SET post_count = ( post_count + 1 )
		WHERE slug = NEW.tag_slug;
END;-- --

CREATE TRIGGER tag_before_delete BEFORE DELETE ON post_tags FOR EACH ROW 
BEGIN
	UPDATE tags SET post_count = ( post_count - 1 )
		WHERE slug = OLD.tag_slug;
END;-- --

-- Searching
CREATE VIRTUAL TABLE post_search USING fts5(
	post_id UNINDEXED,
	title,
	body,
	tags,
	tokenize = 'unicode61 remove_diacritics 2'
);-- --

CREATE TRIGGER post_before_update BEFORE UPDATE ON posts FOR EACH ROW
BEGIN
	DELETE FROM post_tags WHERE post_id = OLD.id;
END;-- --
