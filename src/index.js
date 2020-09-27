const body = document.querySelector("body");
const bodyStyles = getComputedStyle(body);
const eligibleElements = document.querySelectorAll(".swtoggledark");
const toggle = document.querySelector("#sw-switcher-checkbox");

document.addEventListener("DOMContentLoaded", () => {
	if (isDarkThemeEnabled()) {
		loadTheme();
		toggle.checked = true;
	}
});

toggle.addEventListener("change", (e) => {
	if (e.target.checked) {
		loadTheme();
	} else {
		resetColors();
		resetDarkTheme();
	}
});

function loadTheme() {
	setColors();
	setDarkTheme();
}

function setColors() {
	eligibleElements.forEach((item) => {
		Object.keys(sw_colors).forEach((key) => {
			const clrVar = `--e-global-color-${key}`;
			item.style.setProperty(clrVar, sw_colors[key]);
		});
	});
}

function resetColors() {
	eligibleElements.forEach((item) => {
		Object.keys(sw_colors).forEach((key) => {
			const colorVar = `--e-global-color-${key}`;
			const defaultVal = bodyStyles.getPropertyValue(colorVar);
			item.style.setProperty(colorVar, defaultVal);
		});
	});
}

function setDarkTheme() {
	localStorage.setItem("sw_dark_theme_status", "enabled");
}

function resetDarkTheme() {
	localStorage.removeItem("sw_dark_theme_status");
}

function isDarkThemeEnabled() {
	return localStorage.getItem("sw_dark_theme_status");
}
