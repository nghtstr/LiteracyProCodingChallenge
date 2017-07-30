# LiteracyProCodingChallenge

### Initial Project

I have completed all of the aspects of what was required. The one choice I made was making the editor reside on the same page as the listings because that made more sense from a UI perspective. Here are the requirements as given to me.

##### Task #1: Using Laravel(4.2 or higher), create an application to keep track of your favorite bands and albums.

You should create both "Band" and "Album" database tables and models. All database tables should be created via Laravel migrations. Your application should consist of the following pages:

* Band list page - List all bands (HOMEPAGE)
* Album list page - List all albums. Include a "HTML select" field that contains all bands and can be used to filter the current list of Albums by Band.
* On both list pages, each item listed should contain edit and delete links.
* If you click the delete button on an album, the application should delete the album.
* If you click the delete button on a band, the application should delete all albums that belong to that band and then it should delete the band.
* If you click the edit link for any list item you should be taken to an edit page for that item. There you should be able to edit any of the fields on the item.
* Use Lavavel relationships to tie the band model to the album model and the album model to the band model.
* Use Lavavel relationships to display the band name on album detail/edit page.
* Use Lavavel relationships to display the album names for a band on the band detail/edit page.
* For the band create/edit page, “name” should be required.
* For the album create/edit page, you should have to select a band via a select box which should be required. The “name” field should also be required.

Band table should have the following fields:
* name
* start_date
* website
* still_active

Album:
* band_id
* name
* recorded_date
* release_date
* number_of_tracks
* label
* producer
* genre

##### Task 2: Describe what this database would look like it you were to use an entity attribute value(EAV) model.

The way that I would change the database using that model would primarily be in the `albums` table. I would change that to be like the following:

* id
* band_id
* name

Then I would have an `album_attributes` table that would look like this:

* id
* album_id
* attribute
* value

> Notice: I always have a Unique ID as that helps speed up MySQL

Also, I would add a `taxonomy` table for those things that should be defined elsewhere (i.e. Genre, Artist, etc.)

* id
* attribute
* value

As well as I would create an `attributes` table like the following:

* id
* attribute
* type
* ordinal

This allows me to have more control of what the attribute types are, as well as it will allow me to have the display of the form be completely dynamic.