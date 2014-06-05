@extends('master')

@section('content')
<style type="text/css">
  .flag-dsc {
    color: rgb(200,200,200)
  }
</style>

  <div class="ui form segment">
    <h3>Basic Files</h3>
    <div class="field">
      <label>Region Name</label>
      <div class="ui left labeled icon input">
        <input type="text" placeholder="Region Name">
        <i class="user icon"></i>
      </div>
    </div>
    <div class="field">
      <label>Mini Point POS</label>
      <div class="ui left labeled icon input">
        <input type="text" placeholder="Mini Point POS ( Ex: -100, 1, 100 )">
        <i class="user icon"></i>
      </div>
    </div>
    <div class="field">
      <label>Max Point POS</label>
      <div class="ui left labeled icon input">
        <input type="text" placeholder="Max Point POS ( Ex: 100, 255, -100 )">
        <i class="user icon"></i>
      </div>
    </div>
    <div class="field">
      <label>Owners</label>
      <div class="ui left labeled icon input">
        <input type="text" placeholder="Owners ( Ex: Mob, VIP )">
        <i class="user icon"></i>
      </div>
    </div>
    <div class="field">
      <label>Members</label>
      <div class="ui left labeled icon input">
        <input type="text" placeholder="Members ( Ex: sntc6655, davy5566 )">
        <i class="user icon"></i>
      </div>
    </div>
  </div>

  <div class="fluid ui blue button">Create Region without Setting Flags</div>

  <div id='flags-state' class="ui form segment">
    <h3>Flags of State</h3>
    <p style="color: rgb(177, 177, 177);">
      This type of flag has three states: allow, none, and deny. allow will allow the event to happen in the region, deny will disallow the event to happen, and none will use the default behavior as if there was no region.
    </p>
    <p style="color: rgb(177, 177, 177);">
      Note that the build flag is unique. If set to none (which it is by default) only members of the region can build.
    </p>
    <table>
      <tbody></tbody>
    </table>
  </div>
  <div id='flags-string' class="ui form segment">
    <h3>Flags of String</h3>
    <p style="color: rgb(177, 177, 177);">
      This can be set to any arbitrary text. Note that if it is unset, it will usually disable the flag.
    </p>
    <p style="color: rgb(177, 177, 177);">
      Some strings support color formatting, such as the greeting and farewell flags. The <a href="http://wiki.sk89q.com/wiki/WorldGuard/Regions/Flags#String" target="_blank">color codes</a> are used in WorldGuard.
    </p>
    <p style="color: rgb(177, 177, 177);">
      Since v5.8.1In, addition, &k, &l, &m, &n, and &o are 'obfuscated/magic', bold, strikethrough, underline, and italic, respectively. The reset code is &x.
    </p>
  </div>
  <div id='flags-list' class="ui form segment">
    <h3>Flags of List</h3>
    <p style="color: rgb(177, 177, 177);">
      This flag can be set to a list of strings. Input values should be comma separated.
    </p>
  </div>
  <div id='flags-integer' class="ui form segment">
    <h3>Flags of Interger</h3>
    <p style="color: rgb(177, 177, 177);">
      This flag can be any number, negative or positive, that does not have a fraction or decimal portion.
    </p>
  </div>
  <div id='flags-boolean' class="ui form segment">
    <h3>Flags of Boolean</h3>
    <p style="color: rgb(177, 177, 177);">
      This flag can be either true or false. It differs from state flags in that it does not have a default position (none) to fall to.
    </p>
  </div>
  <div id='flags-location' class="ui form segment">
    <h3>Flags of Location</h3>
    <p style="color: rgb(177, 177, 177);">
      This flag represents a location. It consists of an x, y, and z coordinate. It can also be "here" for your current location or "none" to unset the flag.
    </p>
  </div>
  <div id='flags-group' class="ui form segment">
    <h3>Flags of Group</h3>
    <p style="color: rgb(177, 177, 177);">
      Possible values were: members, nonmembers, owners, nonowners, or everyone.
    </p>
    <p style="color: rgb(177, 177, 177);">
      If editing regions.yml directly, the values were: MEMBERS, NON_MEMBERS, OWNERS, NON_OWNERS, or ALL.
    </p>
  </div>

  <div class="fluid ui blue button">Create Region</div>
@stop

@section('footer_scripts')
  @parent
  <script src="{{asset('assets/js/flags.js')}}"></script>
  <script type="text/javascript">
    $('.ui.radio.checkbox')
      .checkbox()
    ;
    $('.popup')
      .popup({
      })
    ;
  </script>
@stop
