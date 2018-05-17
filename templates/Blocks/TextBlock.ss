<div class="block text-block">
    <% if $Content %>
		<div class="panel rounded content">
            <% if $ShowTitle %>
				<h2>$Title</h2>
            <% end_if %>
            $Content
		</div>
    <% end_if %>
</div>