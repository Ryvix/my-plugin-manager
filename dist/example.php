/**
 * Setup suggested plugin system.
 *
 * Include the Theme_Blvd_Plugin_Manager class and add
 * an interface for users to to manage suggested
 * plugins.
 *
 * @since x.x.x
 *
 * @see  Theme_Blvd_Plugin_Manager
 * @link http://mypluginmanager.com
 */
function themeblvd_plugin_manager() {

	if ( ! is_admin() ) {
		return;
	}

	/**
	 * Include plugin manager class.
	 *
	 * No other includes are needed. The Theme_Blvd_Plugin_Manager
	 * class will handle including any other files needed.
	 *
	 * If you want to move the "plugin-manager" directory to
	 * a different location within your theme, that's totally
	 * fine; just make sure you adjust this include path to
	 * the plugin manager class accordingly.
	 */
	require_once( get_parent_theme_file_path( '/plugin-manager/class-theme-blvd-plugin-manager.php' ) );

	/*
	 * Setup suggested plugins.
	 *
	 * It's a good idea to have a filter applied to this so your
	 * loyal users running child themes have a way to easily modify
	 * which plugins show as suggested for the site they're setting
	 * up for a client.
	 */
	$plugins = apply_filters( 'themeblvd_plugins', array(
		array(
			'name'    => 'Easy Digital Downloads',
			'slug'    => 'easy-digital-downloads',
			'version' => '2.8+',
		),
		array(
			'name'    => 'JetPack',
			'slug'    => 'jetpack',
			'version' => '5.0+',
		),
		array(
			'name'    => 'Gravity Forms',
			'slug'    => 'gravityforms',
			'version' => '2.2+',
			'url'     => 'http://www.gravityforms.com', // Only for non wp.org plugins.
		),
	));

	/*
	 * Setup optional arguments for plugin manager interface.
	 *
	 * See the set_args() method of the Theme_Blvd_Plugin_Manager
	 * class for full documentation on what you can pass in here.
	 */
	$args = array(
		'page_title' => __( 'Suggested Plugins', '@@text-domain' ),
		'menu_slug'  => '@@text-domain-suggested-plugins',
	);

	/*
	 * Create plugin manager object, passing in the suggested
	 * plugins and optional arguments.
	 */
	$manager = new Theme_Blvd_Plugin_Manager( $plugins, $args );

}
add_action( 'after_setup_theme', 'themeblvd_plugin_manager' );
