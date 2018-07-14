Promise.prototype.delay = (ms = 1000, func) => {
    return new Promise((resolve, reject) => {
        try {
            setTimeout(() => {
                func && func();
                resolve();
            }, ms);
        } catch (e) {
            reject(e);
        }
    });
};

export default {
    name: 'Simple delay function for promises'
};