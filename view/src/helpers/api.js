var api = {}

var request = () => window.helpers.request;

var base_model = (base) => {
    return {
        get(id) {
            return request().get([base, '/', id].join(''));
        },
        getAll() {
            return request().get(base);
        },
        post(data) {
            return request().post(base, data);
        },
        put(data) {
            return request().put(base, data);
        },
        delete(data) {
            return request().delete(base, data.id);
        }
    }
}

api.expense = base_model('/expense');
api.label = base_model('/label');
api.vendor = base_model('/vendor');

export default api;