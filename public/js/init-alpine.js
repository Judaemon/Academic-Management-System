document.addEventListener('alpine:init', () => {
    Alpine.data('data', () => ({
        isProfileMenuOpen: false,
        toggleProfileMenu() {
            this.isProfileMenuOpen = !this.isProfileMenuOpen
        },

        closeProfileMenu() {
            this.isProfileMenuOpen = false
        },

        isSideMenuOpen: false,
        toggleSideMenu() {
            this.isSideMenuOpen = !this.isSideMenuOpen
        },

        closeSideMenu() {
            this.isSideMenuOpen = false
        },

        isAdminMenuOpen: false,
        toggleAdminMenu() {
            this.isAdminMenuOpen = !this.isAdminMenuOpen
        },

        isAcademicMenuOpen: false,
        toggleAcademicMenu() {
            this.isAcademicMenuOpen = !this.isAcademicMenuOpen
        },

        isAccountingMenuOpen: false,
        toggleAccountingMenu() {
            this.isAccountingMenuOpen = !this.isAccountingMenuOpen
        }
    }))
})
