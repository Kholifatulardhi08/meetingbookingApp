<input id="user_id" type="user_id"
class="form-control @error('user_id') is-invalid @enderror" name="user_id"
value="{{ old('user_id') }}" required autocomplete="code">
