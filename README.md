# This CRAP.

**Concise. Relevant. Applied. Practical.**

A learning website designed to teach the four core design principles — ***Contrast, Repetition, Alignment, and Proximity (CRAP)*** — through interactive, visual, and hands-on experiences.

## Overview

“This CRAP.” combines concise explanations, visual examples, and interactive exercises to help students, educators, and young professionals alike to grasp each design principle in minutes.

Unlike lengthy blogs or abstract design theory resources, this platform focuses on *learning by doing* — delivering instant feedback, clear visuals, and bite-sized lessons that make design principles *intuitive and actionable.*

## Key Features

- *Micro-learning modules* — Short, focused lessons for each CRAP principle.

- *Visual examples* — Clean, minimalist visuals that demonstrate good and bad design.

- *Interactive exercises* — Drag, drop, and adjust layouts to test understanding in real time.

- *Instant feedback* — Immediate evaluation of user choices to reinforce learning.

- *Reduced cognitive load* — A distraction-free interface that embodies the very principles it teaches.

## Live Demo

Visit the website here!

## Getting Started

### 1. Clone the repository

```shell
git clone git@github.com:ISTE-240-Team-4/crap-design-project.git
```

### 2a. Running locally via Docker Compose

1. Ensure file sharing in Docker

Settings -> Resources -> File Sharing -> Add current directory

2. Set up `.env` file and `root_password.txt` in `/database`

3. Start up containers

```shell
docker compose up -d
```

### 2b. Running locally via XAMPP Docker image

1. Ensure file sharing in Docker

Settings -> Resources -> File Sharing -> Add current directory

2. Start docker development container

```shell
docker run --name crap -p 45000:22 -p 45001:80 -d -it -v C:\path\to\crap-design-project:/www tomski68/xampp:latest
```

3. Add MySQL to Path

```shell
export PATH="$PATH:/opt/lampp/bin"

OR

echo $PATH:/opt/lampp/bin > ~/.bashrc
source ~/.bashrc
```

4. Set password for MySQL

```sql
mysql -u root
ALTER USER 'root'@'localhost' IDENTIFIED BY 'NEW_PASSWORD';
FLUSH PRIVILEGES;
```

5. Create database via Adminer or MySQL CLI

```sql
mysql -u root -p
CREATE DATABASE this-crap;
USE this-crap;
```

6. Source SQL file via Adminer or MySQL CLI

```sql
SOURCE /www/database/schema.sql;
```

7. Update your database credentials in connection.db.php

```php
<?php $username = "root"; $password = "NEW_PASSWORD"; $host = "localhost"; $databaseName = "this-crap"; ?>
```

### 2c. Running locally via XAMPP

1. Move project files to `/htdocs` folder

2. Follow 2b steps 3-7

### 2d. Running via solace.ist.rit.edu personal account

1. Move project files to `/www/` folder

2. Update your database credentials in connection.db.php based off credentials in `~/.my.cnf`

```php
<?php $username = "root"; $password = "password"; $host = "localhost"; $databaseName = "databaseName"; ?>
```

3. Source SQL file via Adminer or MySQL CLI

### 3. View Website

Navigate to

- <http://localhost:8080> (Docker Compose, XMAPP)
- <http://localhost:PORT/www> (XAMPP Docker Image)
- <https://solace.ist.rit.edu/~user/path/to/folder> (solace.ist.rit.edu)

### 4. Tear Down

- Docker Compose

```shell
docker compose down
```

- XAMPP Docker Image

```shell
docker stop crap
docker remove crap
```

## Contributors

- Nora Miskulin

- Howard Kong

- Emily Chen

- Michael Wojcik

- James Bragoudakisferri

- Robert Becker
