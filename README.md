# PezBase
Code for the Pezbase website

### Several custom Drupal modules are used to run PezBase


Features
--------
 * [pezbase_data](#data)
 * [pezbase_examples](#example-data)
 * [pezbase_import](#data-import)
 * [pezbase_ui](#reports)
 * [pezbase_theme](#theme)

Setup
-----
From the command line:
bash ./install.sh

### Data
 A data module collects all the custom entities and fields for the website.

### Example Data
 Installing this module will add some test data to the database to ensure the theme looks good without having to migrate the entire database over.
 
### Data Import
 The existing data in in a postgresql database, and is in a different format than standard drupal entities. This module imports the data into Drupal

### Reports
 A UI module contains custom controllers and views.
 
### Theme
 A theme module provides the look of the wbesite
