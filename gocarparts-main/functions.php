function create_custom_products_full_table() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'custom_products_full';

    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE IF NOT EXISTS $table_name (
        id BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
        post_id BIGINT(20) UNSIGNED NOT NULL UNIQUE,
        post_author BIGINT(20),
        post_date DATETIME,
        post_date_gmt DATETIME,
        post_content LONGTEXT,
        post_title TEXT,
        post_excerpt TEXT,
        post_status VARCHAR(20),
        comment_status VARCHAR(20),
        ping_status VARCHAR(20),
        post_password VARCHAR(255),
        post_name VARCHAR(200),
        to_ping TEXT,
        pinged TEXT,
        post_modified DATETIME,
        post_modified_gmt DATETIME,
        post_content_filtered TEXT,
        post_parent BIGINT(20),
        guid VARCHAR(255),
        menu_order INT,
        post_type VARCHAR(20),
        post_mime_type VARCHAR(100),
        comment_count BIGINT(20),
        meta_data LONGTEXT,
        PRIMARY KEY (id)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}
add_action('after_setup_theme', 'create_custom_products_full_table');
