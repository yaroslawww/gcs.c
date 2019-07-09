import axios from 'axios'
import _ from 'lodash'

export const formValidationMixin = {
    data() {
        return {
            externalValidationErrors: {},
            internalValidationErrors: {},
            request: {},
            isFormLoading: false,
        }
    },
    computed: {
        validationErrors() {
            return Object.assign(this.externalValidationErrors, this.internalValidationErrors)
        },
        isSubmitBlocked() {
            return this.isFormLoading
        },
    },
    methods: {
        onFormSubmit() {
            if (this.isSubmitBlocked) {
                return
            }
            if (this.isFormValid()) {
                this.beforeFormRequest()
                setTimeout(() => {
                    axios(Object.assign(this.request, this.generateAxiosConfig()))
                        .then(response => {
                            this.parseResponse(response)
                        })
                        .catch(error => {
                            this.parseError(error)
                        })
                        .finally(() => {
                            this.finallyFormRequest()
                        })
                }, 0)
            }
        },
        beforeFormRequest() {
            this.isFormLoading = true
        },
        finallyFormRequest() {
            this.isFormLoading = false
        },
        validateFields() {
            // Stub method. Will be overridden in components
        },
        isFormValid() {
            this.validateFields()
            return _.isEmpty(this.internalValidationErrors)
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
            return {}
        },
        createFormData() {
            // Stub method. Will be overridden in components
            // let formData = new FormData()
            // formData.append('some_name', 'some_value')
            return new FormData
        },
        parseResponse(response) {
            //console.log(response)
            if (_.get(response, 'data.data.redirect')) {
                location.href = response.data.data.redirect
                return
            }
            location.reload()
        },
        handleRequestErrorOther(errorResponse) {
            console.log('Handle others not 2xx responses')
            console.log(errorResponse)
        },
        handleRequestError500(errorResponse) {
            console.log('Handle 5xx errors')
            console.log(errorResponse)
        },
        handleRequestError401(errorResponse) {
            console.log('Handle Session Timeouts')
            console.log(errorResponse)
        },
        handleRequestError403(errorResponse) {
            console.log('Handle Forbidden')
            console.log(errorResponse)
        },
        // eslint-disable-next-line no-unused-vars
        handleRequestError419(errorResponse) {
            console.log('Handle Token Timeouts')
            //console.log(errorResponse)
            // eslint-disable-next-line no-undef
            this.$toasted.show(__('Token Expired. Please refresh page.'))
        },
        handleRequestError422(errorResponse) {
            //console.log('Handle Validation Error')
            //console.log(errorResponse)
            const {data,} = errorResponse

            if (!_.isObject(data.errors)) {
                console.warn('data.errors should be array')
                return
            }

            this.externalValidationErrors = this.formatValidationErrors(data.errors)
        },
        handleRequestError429(errorResponse) {
            //console.log('To many requests')
            //console.log(errorResponse)
            const {data,} = errorResponse

            if (!_.isObject(data.errors)) {
                console.warn('data.errors should be array')
                return
            }

            const errors = this.formatValidationErrors(data.errors)

            this.$toasted.show(errors[Object.keys(errors)[0]])
        },
        formatValidationErrors(errors) {
            Object.keys(errors).map(key => {
                if (_.isArray(errors[key])) {
                    errors[key] = errors[key].shift()
                }
            })

            return errors
        },
        parseErrorResponse(errorResponse) {
            // eslint-disable-next-line no-unused-vars
            let {data, status, headers,} = errorResponse

            // Show the user a 500 error
            if (status > 500) {
                this.handleRequestError500(errorResponse)
            }

            if (typeof this['handleRequestError' + status] === "function") {
                this['handleRequestError' + status](errorResponse)
            } else {
                this.handleRequestErrorOther(errorResponse)
            }
        },
        parseError(error) {
            if (error.response) {
                // The request was made and the server responded with a status code
                // that falls out of the range of 2xx
                this.parseErrorResponse(error.response)
            } else if (error.request) {
                // The request was made but no response was received
                // `error.request` is an instance of XMLHttpRequest in the browser and an instance of
                // http.ClientRequest in node.js
                console.log(error.request)
            } else {
                // Something happened in setting up the request that triggered an Error
                console.log('Error', error.message)
            }
            //console.log(error.config)
        },
    },
}
