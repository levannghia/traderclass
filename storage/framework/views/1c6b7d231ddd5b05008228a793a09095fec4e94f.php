<script>
        const $ = document.querySelector.bind(document)
        const $$ = document.querySelectorAll.bind(document)

        const tabs = $$('.tab-item')
        const panes = $$('.tab-pane')

        tabs.forEach((tab, index) => {
            const pane = panes[index]

            tab.onclick = function() {
                $('.tab-item.active').classList.remove('active')
                $('.tab-pane.active').classList.remove('active')

                this.classList.add('active')
                pane.classList.add('active')
            }
        })
</script><?php /**PATH C:\wamp64\traderclass\app\Modules/Sites/Views/payment-atm/script.blade.php ENDPATH**/ ?>