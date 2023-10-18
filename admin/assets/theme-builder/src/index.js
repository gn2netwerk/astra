import React from 'react';
import ReactDOM from 'react-dom';
import App from "./App";
import { __ } from "@wordpress/i18n";

/**
 * Import the stylesheet for the plugin.
 */
import './style/main.css';

ReactDOM.render(
    <App />,
	document.getElementById('ast-tb-app-root')
);