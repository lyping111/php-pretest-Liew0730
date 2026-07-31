CREATE database if not exists task3;
use task3;

create table if not exists user(
    Receiving_date int(11) primary key auto_increment,
    Tracking_number varchar(255),
    product_name varchar(255),
    CBM varchar(10),
    weight varchar(10)
);

INSERT INTO user(Tracking_number, product_name, CBM, weight)
VALUES ('TRK001', 'Apple135', '1.5', '10.5'),('TRK002', 'Banana246', '2.3', '15.6'),('TRK003', 'Cat456', '0.8', '5.2'),('TRK004', 'Dog123', '3.0', '22.1');

UPDATE user
SET product_name = 'Apple135' 
WHERE Tracking_number = 'TRK001';

DELETE FROM user 
WHERE Tracking_number = 'TRK004';

SELECT * FROM user WHERE weight > 10;
SELECT * FROM user WHERE product_name LIKE '%Product%';

SELECT * FROM user ORDER BY weight ASC;
SELECT * FROM user ORDER BY CBM DESC;

ALTER TABLE user ADD COLUMN remark VARCHAR(500) COMMENT 'Notes';

ALTER TABLE user MODIFY COLUMN CBM DECIMAL(5,2);
ALTER TABLE user CHANGE COLUMN weight net_weight DECIMAL(5,2);