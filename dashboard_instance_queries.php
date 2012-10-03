<?php

/*
 * Working out the queries for block instances.
*/

/*
 * Block properties from {block}
 * delta
 * bid
 * module
 * theme
 * status
 * region
*/

/*
 * {multiblock}
 * delta (assigned by multiblock module)
 * title
 * module
 * orig_delta
 * multi_settings
*/

/*
 * {dashboard_multigraph} This is the custom table.
 * multigraph_bid (key?)
 * dashboard_delta (key?)
 * block-specific settings for the swf
 *   dashboard_width
 *   dashboard_height
 *   dashboard_swf_path
 *   dashboard_config_path
*/

/*
 * Run drupal_write_record() when a new block is created.
 * The first one will be the module default.
 * All following instances will be created using multiblock.
 *
 * Need to connect settings form to {dashboard_multigraph}
 *   using db_merge() or db_update().
*/

/* drupal_write_record() documentation:
drupal_write_record($table, &$record, $primary_keys = array())

Saves (inserts or updates) a record to the database based upon the schema.

Parameters

$table: The name of the table; this must be defined by a hook_schema() 
implementation.

$record: An object or array representing the record to write, passed in by 
reference. If inserting a new record, values not provided in $record will be 
populated in $record and in the database with the default values from the 
schema, as well as a single serial (auto-increment) field (if present). If 
updating an existing record, only provided values are updated in the database, 
and $record is not modified.

$primary_keys: To indicate that this is a new record to be inserted, omit this 
argument. If this is an update, this argument specifies the primary keys' 
field names. If there is only 1 field in the key, you may pass in a string; if 
there are multiple fields in the key, pass in an array.

Return value

If the record insert or update failed, returns FALSE. 
If it succeeded, returns SAVED_NEW or SAVED_UPDATED, depending on the 
operation performed.

*/

/* 
 * Initial drupal_write_record().
 * Variable values will come from 
	   $table = 'dashboard_multigraph';
		 $key = 'bid';
	   $record = array(
			'bid' => $bid,
			'dashboard_delta' => $delta,
			'dashboard_width' => $width,
			'dashboard_height' => $height,
			'dashboard_swf_path' => $swf_path,
			'dashboard_config_path' => $config_path,
		  );
	   drupal_write_record($table, &$record); 
 * To update the record, use drupal_write_record($table, &$record, $key);
*/

/*
 * Using drupal_write_record() for multiblock controlled blocks
 * Multiblock does not provide hooks, which will make interacting with it
 *  less straightforward.
 * Test hook_block_save() to see if instance values can be pulled from there.
*/

/*
 * Concerns
 * 	May need configuration settings per theme, which adds complication.
*/


