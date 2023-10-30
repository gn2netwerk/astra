import { createURL } from '@wordpress/e2e-test-utils';
import { setCustomize } from '../../../../../utils/customize';
describe( 'above header bottom border size and color setting in customizer', () => {
	it( 'bottom border size and bottom border color should apply correctly', async () => {
		const bottomBorder = {
			'hba-header-separator': '10',
			'hba-header-bottom-border-color': 'rgb(215, 220, 255)',
			'header-desktop-items': {
				above: {
					above_left: {
						0: 'widget-1',
					},
				},
			},
		};
		await setCustomize( bottomBorder );
		await page.goto( createURL( '/' ), {
			waitUntil: 'networkidle0',
		} );

		await expect( {
			selector: '.ast-above-header-bar',
			property: 'border-bottom-color',
		} ).cssValueToBe(
			`${ bottomBorder[ 'hba-header-bottom-border-color' ] }`,
		);
	} );
} );
