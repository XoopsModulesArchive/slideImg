CREATE TABLE slideimg_items (
  sid int(11) unsigned NOT NULL auto_increment,
  name varchar(255) NOT NULL default '',
  imgurl varchar(255) NOT NULL default '',
  url varchar(255) NOT NULL default '',
  PRIMARY KEY  (sid),
  KEY sid (sid)
) TYPE=MyISAM;
