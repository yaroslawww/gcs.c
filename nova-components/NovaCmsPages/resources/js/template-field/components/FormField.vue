<template>
    <default-field :field="field" :errors="errors">
        <template slot="field">
            {{field}}
            <input
                    :id="field.name"
                    type="text"
                    class="w-full form-control form-input form-input-bordered"
                    :class="errorClasses"
                    :placeholder="field.name"
                    v-model="value"
            />
            <select-control
                    :id="field.attribute"
                    :dusk="field.attribute"
                    v-model="value"
                    class="w-full form-control form-select"
                    :class="errorClasses"
                    :options="field.options"
                    :disabled="isReadonly"
            >
                <option value="" selected>{{ __('Choose anqwe option') }}</option>
                <option value="1" selected>{{ __('Choose an option') }}</option>
                <option value="2" selected>{{ __('Chooseq an option') }}</option>
                <option value="3" selected>{{ __('Choose anqwe option') }}</option>
            </select-control>
        </template>
    </default-field>
</template>

<script>
    import {FormField, HandlesValidationErrors} from 'laravel-nova'

    export default {
        mixins: [FormField, HandlesValidationErrors],

        props: ['resourceName', 'resourceId', 'field'],

        mounted() {
            axios.get(this.field.urlTemplatesList)
                .then(response => {
                    console.log(response.data)
                });
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
        },
    }
</script>
