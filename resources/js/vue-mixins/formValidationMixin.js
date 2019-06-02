import axios from 'axios'

export const formValidationMixin = {
    data() {
        return {
            validationErrors: {},
            request: {}
        }
    },
    methods: {
        onFormSubmit() {
            console.log('onFormSubmit')
            if (this.isFormValid()) {
                axios(Object.assign(this.request, this.generateAxiosConfig()))
                    .then(function (response) {
                        this.parseResponse(response)
                    })
                    .catch(function (error) {
                        this.parseError(error)
                    });
            }
        },
        validateFields() {
            // Stub method. Will be overridden in components
        },
        isFormValid() {
            this.validateFields()
            return _.isEmpty(this.validationErrors)
        },
        getValidationErrorText(name) {

            if (_.isString(this.validationErrors[name])) {
                return this.validationErrors[name]
            }

            if (_.isObject(this.validationErrors[name]) && !_.isEmpty(this.validationErrors[name])) {
                return _.values(this.validationErrors[name])[0]
            }

            if (_.isArray(this.validationErrors[name]) && !_.isEmpty(this.validationErrors[name])) {
                return this.validationErrors[name][0]
            }

            return null
        },
        generateAxiosConfig() {
            return {
                data: this.createFormData()
            }
        },
        createFormData() {
            // Stub method. Will be overridden in components
            // let formData = new FormData()
            // formData.append('some_name', 'some_value')
            return new FormData;
        },
        parseResponse(response) {
            // Stub method
        },
        parseError(error) {
            if (error.response) {
                // The request was made and the server responded with a status code
                // that falls out of the range of 2xx
                console.log(error.response.data);
                console.log(error.response.status);
                console.log(error.response.headers);
            } else if (error.request) {
                // The request was made but no response was received
                // `error.request` is an instance of XMLHttpRequest in the browser and an instance of
                // http.ClientRequest in node.js
                console.log(error.request);
            } else {
                // Something happened in setting up the request that triggered an Error
                console.log('Error', error.message);
            }
            console.log(error.config);
        }
    }
}