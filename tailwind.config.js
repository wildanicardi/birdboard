let colors = {
    default: "var(--text-default-color)",
    accent: "var(--text-accent-color)",
    "accent-light": "var(--text-accent-light-color)",
    muted: "var(--text-muted-color)",
    "muted-light": "var(--text-muted-light-color)"
};
module.exports = {
    purge: [],
    theme: {
        extend: {
            backgroundColor: {
                page: "var(--page-background-color)",
                card: "var(--card-background-color)",
                button: "var(--button-background-color)",
                header: "var(--header-background-color)"
            },
            textColor: colors
        }
    },
    variants: {},
    plugins: [require("postcss-import")]
};
