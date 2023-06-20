#fn collect tag from traffic visited post

#fn most search
#fn most upvoted
#fn best discussion
#tb reading history
#tb bookmark
#fn related topic


1 Tutorial/Books/
  * A tutorial could be `php` 
  * a tutorial could made by a user
  * a tutorial could made a company
1.1 A section/Set/Chapter could be a chapter/set of this tutorial (Section 4. Operators, Section 5. Control flow)
  * A section/Set/Chapter could be 
1.1.1 a post type could be tutorial 
1.1.1.1 pivot_tutorial_section
1.1.1.1. pivot_section_post / pivot_set_post

`tutorials > sections/sets/chapter > posts`
series > posts

#tb tutorials ->belongsToUser
#tb sets -> belongsToCompany
#tb posts ->belongsToCompany
#tb pivot_tutorial_set
#tb pivot_set_post

#tb series
#tb pivot_series_post

slug always posts/slug
write_for_company

# vote for difficulty
Easy
Normal
Medium
Hard
Expert
