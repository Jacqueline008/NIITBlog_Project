$(function () {
    //此区域是vue实现的markdown编辑区
    new Vue({
        el: '#editor',
        data: {
            input: '## 支持markdown语法\n### 快来试试吧'
        },
        computed: {
            compiledMarkdown: function () {
                return marked(this.input, { sanitize: true })
            }
        },
        methods: {
            update: _.debounce(function (e) {
                this.input = e.target.value
            }, 300)
        }
    })
});
