select password('revtini_dev')

CREATE USER 'revtini_dev'@'%' IDENTIFIED BY PASSWORD '*CC59D7840828DECFE89B1528FAF60BFE061BC314'

GRANT ALL PRIVILEGES ON revtini_dev.* TO 'revtini_dev'@'%' WITH GRANT OPTION;

 mysqldump -u revtini_dev -p revtini_dev   > "D:/AAA Projects/bizReview/Revtini/database/bizreview_dev.bak" 