import React from "react";
import iconSVG from "../utils/svg";
import { useState } from "react";

function Card({ title, icon, layout, template, enabled }) {
	const [isHovered, setIsHovered] = useState(false);

	const handleMouseEnter = () => {
		setIsHovered(true);
	};

	const handleMouseLeave = () => {
		setIsHovered(false);
	};

	const loadSVG = () => {
		switch (layout) {
			case "header":
				return iconSVG.Header;
				break;
			case "footer":
				return iconSVG.Footer;
				break;
			case "404-page":
				return iconSVG.Page_404;
				break;
			case "hooks":
				return iconSVG.Hooks;
				break;
			case "content":
				return iconSVG.Content;
				break;
			case "template":
				return template && "single" === template
					? iconSVG.Single
					: iconSVG.Archive;
				break;
			default:
				break;
		}
	};

	return (
		<div
			className="ast-tb-card-parent"
			onMouseEnter={handleMouseEnter}
			onMouseLeave={handleMouseLeave}
		>
			{icon && isHovered && (
				<div className="ast-tb-locked">
					<svg
						xmlns="http://www.w3.org/2000/svg"
						viewBox="0 0 24 24"
						fill="currentColor"
						class="w-6 h-6"
					>
						<path
							fill-rule="evenodd"
							d="M12 1.5a5.25 5.25 0 00-5.25 5.25v3a3 3 0 00-3 3v6.75a3 3 0 003 3h10.5a3 3 0 003-3v-6.75a3 3 0 00-3-3v-3c0-2.9-2.35-5.25-5.25-5.25zm3.75 8.25v-3a3.75 3.75 0 10-7.5 0v3h7.5z"
							clip-rule="evenodd"
						/>
					</svg>
					<button
						className="ast-tb-card-hover-btn"
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
			)}
			<div
				className={`ast-tb-card ${
					isHovered ? "ast-tb-card-blur-on-hover" : ""
				}`}
			>
				<div className="ast-tb-card-icon-wrapper">
					{icon ? icon : loadSVG()}
				</div>
				<div className="ast-tb-card-title-wrapper">
					{enabled ? (
						<svg
							width="8"
							height="8"
							viewBox="0 0 8 8"
							fill="none"
							xmlns="http://www.w3.org/2000/svg"
						>
							<circle cx="4" cy="4" r="3" fill="#17B26A" />
						</svg>
					) : (
						<svg
							width="8"
							height="8"
							viewBox="0 0 8 8"
							fill="none"
							xmlns="http://www.w3.org/2000/svg"
						>
							<circle cx="4" cy="4" r="3" fill="#94A3B8" />
						</svg>
					)}
					<h3 className="ast-tb-card-title">{title}</h3>
				</div>
			</div>
		</div>
	);
}

export default Card;
