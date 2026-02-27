-- Installation metadata
CREATE TABLE IF NOT EXISTS schema_meta (
	version TEXT NOT NULL PRIMARY KEY,
	created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	comments TEXT
);

CREATE TABLE IF NOT EXISTS maintenance_meta (
	maintenance_id INTEGER PRIMARY KEY AUTOINCREMENT,
	updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	settings TEXT NOT NULL DEFAULT '{}'
);

CREATE TRIGGER trg_update_maintenance_meta
BEFORE UPDATE ON maintenance_meta
FOR EACH ROW
BEGIN
	UPDATE maintenance_meta SET updated_at = CURRENT_TIMESTAMP
		WHERE maintenance_id = NEW.maintenance_id;
END;

CREATE TABLE IF NOT EXISTS cache_pages(
	cache_id INTEGER PRIMARY KEY AUTOINCREMENT,
	realm TEXT NOT NULL,
	uri TEXT NOT NULL,
	content TEXT,
	is_partial INTEGER DEFAULT 0 
		CHECK ( is_partial IN ( 0, 1 ) ),
	status_code INTEGER DEFAULT 200
		CHECK ( status_code BETWEEN 100 AND 599 ),
	dynamic_keys TEXT NOT NULL DEFAULT '{}',
	created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	expires_at TIMESTAMP
);
CREATE UNIQUE INDEX idx_cache_realm_uri ON cache_pages( realm, uri );
CREATE INDEX idx_cache_created ON cache_pages( created_at );
CREATE INDEX idx_cache_updated ON cache_pages( updated_at );
CREATE INDEX idx_cache_expires ON cache_pages( expires_at ) 
	WHERE expires_at IS NOT NULL;

CREATE TRIGGER trg_update_cache_pages 
BEFORE UPDATE ON cache_pages
FOR EACH ROW
BEGIN
	UPDATE cache_pages SET updated_at = CURRENT_TIMESTAMP 
		WHERE cache_id = NEW.cache_id;
END;

CREATE TABLE IF NOT EXISTS cache_summary (
	realm TEXT NOT NULL,
	uri TEXT NOT NULL,
	hits INTEGER DEFAULT 0,
	misses INTEGER DEFAULT 0,
	last_access_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
) WITHOUT ROWID;
