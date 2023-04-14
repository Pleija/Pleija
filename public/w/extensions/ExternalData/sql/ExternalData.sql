CREATE TABLE  /*_*/ed_url_cache (
  id INTEGER  NOT NULL,
  url TEXT UNIQUE  NOT NULL,
  post_vars TEXT  NOT NULL,
  req_time INTEGER UNSIGNED NOT NULL default 0,
  result TEXT ,
  PRIMARY KEY(id)
);
