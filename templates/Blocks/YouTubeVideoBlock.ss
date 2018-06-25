<div class="block you-tube-block $width">
    <% if $ShowTitle %>
        <h2>$Title</h2>
    <% end_if %>
    <div class="videoWrapper  <% if $border %>border<% end_if %>">
        <!-- Copy & Pasted from YouTube -->
        <iframe id="video-$ID" width="560" height="349" src="<% if $link %>$link<% else_if $embedCode %>https://www.youtube.com/embed/$embedCode<% end_if %>" frameborder="0" allowfullscreen></iframe>
    </div>
    <% if $caption %>
        <div class="caption">$caption</div>
    <% end_if %>
</div>