class Token {

    isValid(token) {
        const payload = this.payload(token);
        if (payload) {
            return payload.iss == "http://realtime.test/api/auth/login" || "http://realtime.test/api/auth/signup"
        }

        return false;
    }

    payload(token) {
        const payload = token.split('.')[1];
        return this.decode(payload);
    }

    decode(payload) {
        if (this.isBase64(payload)) {
            return JSON.parse(atob(payload));    
        }
        return false;
    }

    isBase64 (str) { // localstorageにtokenを手動で打ち込まれたときの対策
        try {
            // return btoa(atob(str)) == str
            // 上記だと、文字列の最後に=が含まれるため
            return btoa(atob(str)).replace(/=/g, "") == str
        }
        catch (err) {
            return false;
        }
    }
}

export default Token = new Token();
