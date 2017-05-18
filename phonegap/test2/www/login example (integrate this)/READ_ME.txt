for this system to work a database needs to exist at host 'localhost' with username 'root' with the password 'secret' and it operates on a table called "infs3202"
The following table should be in this database:

CREATE TABLE USERS (
USERNAME VARCHAR(255) NOT NULL,
PASSWORD VARCHAR(255) NOT NULL
);
ALTER TABLE USERS ADD PRIMARY KEY (USERNAME);

password's capacity has to be around 255 as it is encrypted

from index.html you can:
- login with and existing user (there will be none unless create_user.html is used first) and be redirected to example.html
- go to create_user.html or
- test your session status (there should not be a session active on this page).

from create_user.html you can:
- create a user
- or return to index.html
A user cannot be created with a blank username or password and the username must be unique. Once created you will redirect to index.html

from example.html you can:
- log out
- display your username in an alert with a little message
- test your session status (should always be active on this page)

Riley is Awesome