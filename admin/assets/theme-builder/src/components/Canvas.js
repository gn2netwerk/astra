import React from "react";
import Layouts from "./Layouts";
import { BrowserRouter as Router, Switch, Route } from "react-router-dom";

const Canvas = () => {
	return (
		<div className="ast-tb-canvas">
			<div className="ast-tb-canvas-body">
				<div className="ast-tb-canvas-header">
					<h2>Start customizing every part of your website.</h2>
					<button
						className="ast-tb-btn ast-tb-btn-primary"
						onClick={() =>
							window.open(
								astra_theme_builder.astra_pricing_page_url,
								"_blank"
							)
						}
					>
						Upgrade
					</button>
				</div>
				<div className="ast-tb-canvas-content">
					<Switch>
						<Route path="/">
							<Layouts />
						</Route>
					</Switch>
				</div>
			</div>
		</div>
	);
};

export default Canvas;
