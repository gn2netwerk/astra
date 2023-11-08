<?php
/**
 * Class Test_Astra_Queried_Post_Types
 *
 * @package Astra
 */

/**
 * Tests Theme Supported Post Types.
 */
class Test_Astra_Queried_Post_Types extends WP_UnitTestCase {
	/**
	 * Testing Astra Supported Post Types.
	 */
	function test_astra_queried_post_types() {
		$post_types = astra_get_queried_post_types();

		$this->assertContains('post', $post_types);
		$this->assertContains('page', $post_types);
		$this->assertNotContains('astra-advanced-hook', $post_types);
		$this->assertNotContains('astra_adv_header', $post_types);
		$this->assertNotContains('elementor_library', $post_types);
		$this->assertNotContains('brizy_template', $post_types);
		$this->assertNotContains('sc_collection', $post_types);
		$this->assertNotContains('course', $post_types);
		$this->assertNotContains('lesson', $post_types);
		$this->assertNotContains('llms_membership', $post_types);
		$this->assertNotContains('tutor_quiz', $post_types);
		$this->assertNotContains('tutor_assignments', $post_types);
		$this->assertNotContains('testimonial', $post_types);
		$this->assertNotContains('frm_display', $post_types);
		$this->assertNotContains('mec_esb', $post_types);
		$this->assertNotContains('mec-events', $post_types);
		$this->assertNotContains('sfwd-assignment', $post_types);
		$this->assertNotContains('sfwd-essays', $post_types);
		$this->assertNotContains('sfwd-transactions', $post_types);
		$this->assertNotContains('sfwd-certificates', $post_types);
		$this->assertNotContains('sfwd-quiz', $post_types);
		$this->assertNotContains('e-landing-page', $post_types);
	}
}
