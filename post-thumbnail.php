<?php
namespace Jet_Engine_CVC;

class Post_Thumbnail extends \Jet_Engine\Modules\Dynamic_Visibility\Conditions\Base {

	/**
	 * Returns condition ID
	 *
	 * @return string
	 */
	public function get_id() {
		return 'jet-ecvc-post-thumbnail';
	}

	/**
	 * Returns condition name
	 *
	 * @return string
	 */
	public function get_name() {
		return __( 'Has post thumbnail', 'jet-engine' );
	}

	/**
	 * Returns group for current operator
	 *
	 * @return [type] [description]
	 */
	public function get_group() {
		return 'posts';
	}

	/**
	 * Check condition by passed arguments
	 *
	 * @param  array $args
	 * @return bool
	 */
	public function check( $args = array() ) {

		$type    = ! empty( $args['type'] ) ? $args['type'] : 'show';

		$post_id = get_the_ID();

		$has_thumbnail = has_post_thumbnail( $post_id );

		if ( 'hide' === $type ) {
			return ! $has_thumbnail;
		} else {
			return $has_thumbnail;
		}

	}

	/**
	 * Check if is condition available for meta fields control
	 *
	 * @return boolean
	 */
	public function is_for_fields() {
		return false;
	}

	/**
	 * Check if is condition available for meta value control
	 *
	 * @return boolean
	 */
	public function need_value_detect() {
		return false;
	}

}
