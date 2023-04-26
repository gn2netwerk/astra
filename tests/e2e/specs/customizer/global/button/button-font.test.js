import { insertBlock, createURL, createNewPost } from '@wordpress/e2e-test-utils';
import { setCustomize } from '../../../../utils/customize';
import { publishPost } from '../../../../utils/publish-post';
describe( 'Global button font setting under the Customizer', () => {
	it( 'button font size should apply correctly', async () => {
		const buttonFontSize = {
			'font-size-button': {
				desktop: 30,
				tablet: 20,
				mobile: 10,
				'desktop-unit': 'px',
				'tablet-unit': 'px',
				'mobile-unit': 'px',
			},
		};
		await setCustomize( buttonFontSize );
		await page.goto( createURL( 'buttonFontFamily' ), {
			waitUntil: 'networkidle0',
		} );
		await page.waitForSelector( '.ast-custom-button, .wp-block-button .wp-block-button__link' );
		await expect( {
			selector: '.ast-custom-button, .wp-block-button .wp-block-button__link',
			property: 'font-size',
		} ).cssValueToBe( `${ buttonFontSize[ 'font-size-button' ].desktop }${ buttonFontSize[ 'font-size-button' ][ 'desktop-unit' ] }` );
	} );
	it( 'button font weight should apply correctly', async () => {
		const fontWeight = {
			'font-weight-button': '400',
		};
		await setCustomize( fontWeight );
		await page.goto( createURL( 'buttonFontFamily' ), {
			waitUntil: 'networkidle0',
		} );
		await page.waitForSelector( '.ast-custom-button, .wp-block-button .wp-block-button__link, input#submit, input[type="submit"]' );
		await expect( {
			selector: '.ast-custom-button, .wp-block-button .wp-block-button__link, input#submit, input[type="submit"]',
			property: 'font-weight',
		} ).cssValueToBe( `${ fontWeight[ 'font-weight-button' ] }` );
	} );

	it( 'button font text transform property should apply correctly', async () => {
		const textTransform = {
			'text-transform-button': 'uppercase',
		};
		await setCustomize( textTransform );
		await page.goto( createURL( 'buttonFontFamily' ), {
			waitUntil: 'networkidle0',
		} );
		await page.waitForSelector( '.ast-custom-button, .wp-block-button .wp-block-button__link' );
		await expect( {
			selector: '.ast-custom-button, .wp-block-button .wp-block-button__link',
			property: 'text-transform',
		} ).cssValueToBe( `${ textTransform[ 'text-transform-button' ] }` );
	} );
} );
