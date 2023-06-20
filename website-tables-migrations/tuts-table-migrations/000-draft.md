# from chat gpt 

Users table:

user_id (primary key)
username
email
password
full_name
bio
avatar_url
created_at
updated_at
Articles table:


Tags table:

tag_id (primary key)
name
ArticleTags table (to establish a many-to-many relationship between articles and tags):

article_id (foreign key referencing the Articles table)
tag_id (foreign key referencing the Tags table)
Comments table:

comment_id (primary key)
content
user_id (foreign key referencing the Users table)
article_id (foreign key referencing the Articles table)
created_at
updated_at
Likes table (to track article likes):

like_id (primary key)
user_id (foreign key referencing the Users table)
article_id (foreign key referencing the Articles table)
created_at
Followers table (to manage user following relationships):

follower_id (foreign key referencing the Users table)
following_id (foreign key referencing the Users table)
created_at
Notifications table (to store user notifications):

notification_id (primary key)
user_id (foreign key referencing the Users table)
content
is_read
created_at
Images table (to store uploaded images):

image_id (primary key)
url
user_id (foreign key referencing the Users table)
created_at