<div class="actions bar">
    <ul>
        <li>
            <form method="post">
                <textarea name="data">
                </textarea>
                <input type="submit" value="Save">
            </form>
        </li>
        <li>
            <?= snippet('ckit/main/views/preview/actions/backgrounds'); ?>
        </li>
        <li>
            <div class="switches">
                <div class="switch-outline">
                    <span class="label">Outline</span>
                    <label class="switch">
                        <input type="checkbox" data-toggly-target=".switch-outline input" data-action="outline">
                        <span class="slider"></span>
                    </label>
                </div>

                <div class="switch-margin">
                    <span class="label">Margin</span>
                    <label class="switch">
                        <input type="checkbox" data-toggly-target=".switch-margin input" data-action="margin">
                        <span class="slider"></span>
                    </label>
                </div>
            </div>
        </li>
    </ul>
</div>