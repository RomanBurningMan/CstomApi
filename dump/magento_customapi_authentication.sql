CREATE TABLE magento.customapi_authentication
(
    id int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    token bigint(20) NOT NULL
);
CREATE UNIQUE INDEX customapi_authentication_id_uindex ON magento.customapi_authentication (id);
CREATE UNIQUE INDEX customapi_authentication_token_uindex ON magento.customapi_authentication (token);
INSERT INTO magento.customapi_authentication (id, token) VALUES (1, 12345678987654);