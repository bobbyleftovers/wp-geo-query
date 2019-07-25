# WP Location and Radius Query Vars
Disclaimer: I did not write the sql found here. I've only adapted it to fit my needs and have expanded on that by creating this plugin. Hope you enjoy.

## How It works
Install/activate the plugin. You'll need to be adding lat/lng values to your posts in some way. You could use [this ACF extension](https://github.com/bobbyleftovers/acf-mapbox-field), but however you do it, you run this process by adding some new query params to WP Query:

So a complete set of args might look like this:

	$query = new WP_Query(
		array(
			'post_type' => 'store',
			'posts_per_page' => -1,
			'paged' => 1,
			'geo_query' => array(
				'latitude'  => 40.4952275,	// center of the search
				'longitude' => -74.6487578,	// center of the search
				'distance'  => 30,		// return results within radius
				'units'     => 'miles'		// measurement type (miles, mi, kilometers, km)
			),
			'orderby'] => 'distance',		// this tells WP Query to sort by distance
			'order']   => 'ASC'
		)
	);

This would return all posts within 30 miles of the center. Under the hood this will inject SQL using sevreal WordPress Hooks. The SQL will be based on the [Haversine Formula](https://en.wikipedia.org/wiki/Haversine_formula) for finding the distance between coordinates on a sphere.

I've had this come in super handy on a few occasions. It makes building a store-locator very simple, as the hard part is now done.

### To-do
- Add admin options for the user to specify a table/column to use if the coordinates are not in wp_postmeta.
- Check that this can be used in GraphQL queries