# menu (task 4)

```
CREATE DATABASE db_orders;
CREATE TABLE nekocafe (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pancakes INT NOT NULL,
    cattpacino INT NOT NULL,
    waffles INT NOT NULL,
    sauce VARCHAR(255),
    addons VARCHAR(255) NOT NULL,
    special_requests TEXT
);
```