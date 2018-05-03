CREATE TABLE tx_zamn_domain_model_hans (
  uid INT,
  pid INT NOT NULL DEFAULT 0,
  hans_id VARCHAR(20) NOT NULL DEFAULT '',
  title VARCHAR(255) NOT NULL DEFAULT '',
  content TEXT NOT NULL,
  kalliope TEXT NOT NULL
);
