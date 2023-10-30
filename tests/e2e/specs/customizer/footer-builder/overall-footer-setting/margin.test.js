import { createURL } from '@wordpress/e2e-test-utils';
import { setCustomize } from '../../../../utils/customize';
import { setBrowserViewport } from '../../../../utils/set-browser-viewport';
import { scrollToElement } from '../../../../utils/scroll-to-element';
describe( 'footer builder margin setting in customizer', () => {
	it( 'margin for mobile should apply correctly', async () => {
		const footerBuilderMargin = {
			'section-footer-builder-layout-margin': {
				mobile: {
					top: '40',
					right: '40',
					bottom: '40',
					left: '40',
				},
				'mobile-unit': 'px',
			},
			'footer-desktop-items': {
				primary: {
					primary_1: {
						0: 'social-icons-1',
					},
				},
			},
		};
		await setCustomize( footerBuilderMargin );

		await page.goto( createURL( '/' ), {
			waitUntil: 'networkidle0',
		} );
		await page.waitForSelector( '.site-footer' );

		await setBrowserViewport( 'small' );
		await scrollToElement( '#colophon' );
		await expect( {
			selector: '.site-footer',
			property: 'margin-top',
		} ).cssValueToBe( `${ footerBuilderMargin[ 'section-footer-builder-layout-margin' ].mobile.top }${ footerBuilderMargin[ 'section-footer-builder-layout-margin' ][ 'mobile-unit' ] }`,
		);
		await expect( {
			selector: '.site-footer',
			property: 'margin-right',
		} ).cssValueToBe( `${ footerBuilderMargin[ 'section-footer-builder-layout-margin' ].mobile.right }${ footerBuilderMargin[ 'section-footer-builder-layout-margin' ][ 'mobile-unit' ] }`,
		);
		await expect( {
			selector: '.site-footer',
			property: 'margin-bottom',
		} ).cssValueToBe( `${ footerBuilderMargin[ 'section-footer-builder-layout-margin' ].mobile.bottom }${ footerBuilderMargin[ 'section-footer-builder-layout-margin' ][ 'mobile-unit' ] }`,
		);
		await expect( {
			selector: '.site-footer',
			property: 'margin-left',
		} ).cssValueToBe( `${ footerBuilderMargin[ 'section-footer-builder-layout-margin' ].mobile.left }${ footerBuilderMargin[ 'section-footer-builder-layout-margin' ][ 'mobile-unit' ] }`,
		);
	} );
} );
