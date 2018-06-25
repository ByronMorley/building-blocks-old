<div class="container">
	<main>
		<h1 class="title">$Title</h1>
        <% control $Sections %>
            $Me
        <% end_control %>
        <% if $Parent.Pagination %>
            <% include BlockPagination %>
        <% end_if %>
	</main>
</div>