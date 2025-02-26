import { setCustomize } from '../../../../utils/customize';
import { createURL, createNewPost, insertBlock } from '@wordpress/e2e-test-utils';
import { publishPost } from '../../../../utils/publish-post';
describe( 'Global button setting under the Customizer', () => {
	it( 'button border radius should apply correctly', async () => {
		const borderRadius = {
			'button-radius-fields': {
				desktop: {
					top: '20',
					right: '20',
					bottom: '20',
					left: '20',
				},
				tablet: {
					top: '15',
					right: '15',
					bottom: '15',
					left: '15',
				},
				mobile: {
					top: '5',
					right: '5',
					bottom: '5',
					left: '5',
				},
				'desktop-unit': 'px',
				'tablet-unit': 'px',
				'mobile-unit': 'px',
			},
			'header-desktop-items': {
				above: {
					above_left: {
						0: 'button-1',
					},
				},
			},
			'header-mobile-items': {
				above: {
					above_left: {
						0: 'button-1',
					},
				},
			},
		};
		await setCustomize( borderRadius );
		await page.goto( createURL( 'buttonBorder' ), {
			waitUntil: 'networkidle0',
		} );
		await page.waitForSelector( '.ast-custom-button, .wp-block-button .wp-block-button__link, form[CLASS*="wp-block-search__"].wp-block-search .wp-block-search__inside-wrapper .wp-block-search__button, button' );

		await expect( {
			selector: '.ast-custom-button, .wp-block-button .wp-block-button__link, form[CLASS*="wp-block-search__"].wp-block-search .wp-block-search__inside-wrapper .wp-block-search__button, button',
			property: 'border-top-left-radius',
		} ).cssValueToBe( `${ borderRadius[ 'button-radius-fields' ].desktop.top }${ borderRadius[ 'button-radius-fields' ][ 'desktop-unit' ] }` );
		await expect( {
			selector: '.ast-custom-button, .wp-block-button .wp-block-button__link, form[CLASS*="wp-block-search__"].wp-block-search .wp-block-search__inside-wrapper .wp-block-search__button, button',
			property: 'border-top-right-radius',
		} ).cssValueToBe( `${ borderRadius[ 'button-radius-fields' ].desktop.right }${ borderRadius[ 'button-radius-fields' ][ 'desktop-unit' ] }` );
		await expect( {
			selector: '.ast-custom-button, .wp-block-button .wp-block-button__link, form[CLASS*="wp-block-search__"].wp-block-search .wp-block-search__inside-wrapper .wp-block-search__button, button',
			property: 'border-bottom-right-radius',
		} ).cssValueToBe( `${ borderRadius[ 'button-radius-fields' ].desktop.bottom }${ borderRadius[ 'button-radius-fields' ][ 'desktop-unit' ] }` );
		await expect( {
			selector: '.ast-custom-button, .wp-block-button .wp-block-button__link, form[CLASS*="wp-block-search__"].wp-block-search .wp-block-search__inside-wrapper .wp-block-search__button, button',
			property: 'border-bottom-left-radius',
		} ).cssValueToBe( `${ borderRadius[ 'button-radius-fields' ].desktop.left }${ borderRadius[ 'button-radius-fields' ][ 'desktop-unit' ] }` );
	} );
} );
