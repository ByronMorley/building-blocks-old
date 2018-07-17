<div class="d-flex block pagination-block">
	<ul>
		<li class="page-item"><a class="page-link" href="$Parent.Parent.Link">Back to Menu</a></li>
	</ul>
	<ul class="pagination mx-right">
        <% if $Parent.Children %>
            <% control $Parent.Children %>
				<li class="page-item <% if $LinkingMode =='current' %>active<% end_if %>"><a class="page-link" href="$Link">$Pos</a></li>
            <% end_control %>
        <% end_if %>
	</ul>
</div>