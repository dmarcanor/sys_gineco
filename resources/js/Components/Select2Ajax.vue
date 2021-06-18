<template>
    <select :multiple="!!attr.multiple">
        <slot></slot>
    </select>
</template>

<script>
    export default {
        props: ['config', 'value', 'attr'],

        data() {
            return {
                myConfig: {
                    minimumInputLength: 0,
                    width: '100%'
                },

                myAjax: {
                    delay: 700,
                    dataType: 'json',
                    processResults(data) {
                        return {
                            results: data
                        };
                    },
                    data(params) {
                        return {
                            q: params.term
                        }
                    }
                },
                emitOld: null
            }
        },

        mounted() {
            let vm = this;

            this.myConfig = $.extend(this.myConfig, this.config);
            if (this.config.ajax)
                this.myConfig.ajax = $.extend(this.myAjax, this.config.ajax);

            $(this.$el)
                // init select2
                .select2(this.myConfig)
                .val(this.value)
                .trigger('change')
                // emit event on change.
                .on('change', function () {
                    let val = $(vm.$el).val();

                    if (vm.emitOld && _.isArray(val) && val.length === _.toArray(vm.emitOld).length) {
                        return;
                    }

                    vm.$emit('input', val);
                    vm.emitOld = val;
                })
        },

        watch: {
            value(value, oldValue) {
                let self = this;
                let isValidValue = (val) => {
                    if (typeof val === 'object' && !_.isEmpty(val)) {
                        value = _.toArray(val);
                        return true;
                    }
                    if (typeof val === 'string' && val.length) return true;

                    return !!(typeof val === 'number' && val);
                };

                $(this.$el).val(value);
                if ($(this.$el).val() === null && isValidValue(value)) {
                    if(self.config.ajax){
                        let datos = $.extend({erptkn: window.tkn}, {campo: {id: value}});
                        $.ajax({
                            url: self.config.ajax.url(),
                            type: "POST",
                            data: datos,
                            dataType: "json",
                            success(data) {
                                if (!_.isEmpty(data)) {
                                    if (typeof data[0] === 'object') {
                                        _.forEach(data, (row) => {
                                            let text = typeof row.nombre !== 'undefined' ? row.nombre : row.text;
                                            $(self.$el).append('<option value="' + row.id + '" selected>' + text + '</option>');
                                        });
                                        setTimeout(function () {
                                            $(self.$el).val(value).trigger('change');
                                        }, 1000);
                                    } else {

                                        let text = typeof data.nombre !== 'undefined' ? data.nombre : data.text;
                                        $(self.$el).append('<option value="' + data.id + '" selected>' + text + '</option>');

                                        setTimeout(function () {
                                            $(self.$el).val(data.id != '' ? value : '').trigger('change');
                                        });
                                    }
                                }
                            }
                        });
                    } else {
                        console.log(
                            $(this.$el).prop('name'),
                            $(this.$el).prop('id'),
                            value,
                            "Error when it try set value. The option do not exists."
                        );
                    }
                } else {
                    $(this.$el).val(value).trigger('change');
                }
            }
        },

        // destroyed() {
        //     $(this.$el).off().select2('destroy');
        // }
    };
</script>
