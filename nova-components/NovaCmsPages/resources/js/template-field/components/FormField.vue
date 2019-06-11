<template>
    <div>
        <loading-view :loading="isLoadingTemplates">
            <default-field :field="field" :errors="errors">
                <template slot="field">
                    <select-control
                            :id="field.attribute"
                            :dusk="field.attribute"
                            v-model="value"
                            class="w-full form-control form-select"
                            :class="errorClasses"
                            :options="field.options"
                            :disabled="isReadonly"
                            @change="actionSelectTemplate"
                    >
                        <option value="" selected>{{ __('Default Template') }}</option>
                    </select-control>
                </template>
            </default-field>
        </loading-view>
    </div>
</template>

<script>
    import {FormField, HandlesValidationErrors} from 'laravel-nova'

    export default {
        mixins: [FormField, HandlesValidationErrors],

        props: ['resourceName', 'resourceId', 'field'],

        data() {
            return {
                isLoadingTemplates: true,
                isLoadingTemplateFields: true,
            };
        },

        mounted() {
            this.refreshAllTemplates()
        },

        methods: {
            /*
             * Set the initial, internal value for the field.
             */
            setInitialValue() {
                this.value = this.field.value || ''
            },

            /**
             * Fill the given FormData object with the field's internal value.
             */
            fill(formData) {
                formData.append(this.field.attribute, this.value || '')
            },

            /**
             * Update the field's internal value.
             */
            handleChange(value) {
                this.value = value
            },

            /*Requests*/
            refreshAllTemplates() {
                this.isLoadingTemplates = true;
                this.isLoadingTemplateFields = true;

                axios.get(this.field.urlTemplatesList)
                    .then(response => {
                        console.log(response.data)
                        this.field.options = response.data.templates;
                        this.isLoadingTemplates = false;
                        this.isLoadingTemplateFields = false;
                    });
            },

            /*Actions*/
            actionSelectTemplate(e) {
                let configFile = e.target.value;
                console.log(configFile);
            }
        },
    }
</script>
