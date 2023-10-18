import React from 'react';
import { useLocation } from 'react-router-dom';
import Categories from './components/Categories';

function ThemeBuilderRouter({ categoriesProps, categoryData }) {
	const query = new URLSearchParams( useLocation().search );
	const page = query.get( 'page' );
	const path = query.get( 'path' );

	let routePage = <p> Fallback Route Page </p>;
	if ( 'theme-builder' === page ) {
        switch ( path ) {
            case 'all-layouts':
                routePage = <Categories items={categoriesProps} />;
                break;
            default:
                routePage = <Categories items={categoriesProps} />;
                break;
        }
	}

	return <>{ routePage }</>;
}

export default ThemeBuilderRouter;
