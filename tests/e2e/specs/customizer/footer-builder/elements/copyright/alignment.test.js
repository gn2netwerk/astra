import { createURL } from '@wordpress/e2e-test-utils';
import { setCustomize } from '../../../../../utils/customize';
import { setBrowserViewport } from '../../../../../utils/set-browser-viewport';
import { scrollToElement } from '../../../../../utils/scroll-to-element';
describe( 'copyright alignment settings in the customizer', () => {
	it( 'copyright alignment should apply correctly', async () => {
		const copyrightAlignment = {
			'footer-copyright-alignment': {
				desktop: 'left',
				tablet: 'center',
				mobile: 'right',
			},
		};
		await setCustomize( copyrightAlignment );

		await page.goto( createURL( '/' ), {
			waitUntil: 'networkidle0',
		} );

		await page.waitForSelector( '.ast-footer-copyright' );
		await setBrowserViewport( 'large' );
		await scrollToElement( '#colophon' );
		await expect( {
			selector: '.ast-footer-copyright',
			property: 'text-align',
		} ).cssValueToBe(
			`${ copyrightAlignment[ 'footer-copyright-alignment' ].desktop }`,
		);

		await setBrowserViewport( 'medium' );
		await expect( {
			selector: '.ast-footer-copyright',
			property: 'text-align',
		} ).cssValueToBe(
			`${ copyrightAlignment[ 'footer-copyright-alignment' ].tablet }`,
		);

		await setBrowserViewport( 'small' );
		await expect( {
			selector: '.ast-footer-copyright',
			property: 'text-align',
		} ).cssValueToBe(
			`${ copyrightAlignment[ 'footer-copyright-alignment' ].mobile }`,
		);
	} );
} );
