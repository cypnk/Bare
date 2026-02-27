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

CREATE TABLE IF NOT EXISTS sessions (
	session_id TEXT PRIMARY KEY DEFAULT ( hex( randomblob( 16 ) ) ), 
	user_id INTEGER,
	content TEXT NOT NULL COLLATE NOCASE,
	created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	expires_at TIMESTAMP
) WITHOUT ROWID;
CREATE INDEX idx_session_user ON sessions ( user_id ) 
	WHERE user_id IS NOT NULL;
CREATE INDEX idx_session_created ON sessions ( created_at );
CREATE INDEX idx_session_updated ON sessions ( updated_at );
CREATE INDEX idx_session_expires ON sessions ( expires_at )
	WHERE expires_at IS NOT NULL;

