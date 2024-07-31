
/**
 * @callback VoidCallbackWithInt
 * @param {number} page
 * @return {bool}
 */

class EasyLazyLoading {
    /**
     * 
     * @param {number | null} initialPage 
     * @param {VoidCallbackWithInt} onPageChanged 
     */
    constructor(onPageChanged, initialPage = null) {
        this.page = initialPage ?? 1;
        this.onPageChanged = onPageChanged;
        this.hasMore = true;
        this.isLoading = false;

        this.loadContent = async () => {
            if (!this.hasMore) return;

            this.isLoading = true;
            this.hasMore = await this.onPageChanged(this.page);
            this.isLoading = false;

            if (this.hasMore) this.page++;
        };

        this.listenScroll();
    }

    listenScroll = () => {
        // Debounce the scroll event to prevent multiple rapid calls
        const debouncedHandleScroll = this.debounce(this.handleScroll, 200);
        window.addEventListener('scroll', debouncedHandleScroll);
    }

    debounce = (func, wait) => {
        let timeout;
        return function (...args) {
            clearTimeout(timeout);
            timeout = setTimeout(() => func.apply(this, args), wait);
        };
    }

    handleScroll = () => {
        const { scrollTop, scrollHeight, clientHeight } = document.documentElement;
        if (scrollTop + clientHeight >= scrollHeight - 24) {
            this.loadContent();
        }
    }

    reload = () => {
        this.page = 1;
        this.hasMore = true;
        this.loadContent();
    }
}
