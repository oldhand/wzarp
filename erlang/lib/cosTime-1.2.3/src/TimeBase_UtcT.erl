%%  coding: latin-1
%%------------------------------------------------------------
%%
%% Implementation stub file
%% 
%% Target: TimeBase_UtcT
%% Source: /net/isildur/ldisk/daily_build/20_prebuild_opu_o.2018-03-13_21/otp_src_20/lib/cosTime/src/TimeBase.idl
%% IC vsn: 4.4.3
%% 
%% This file is automatically generated. DO NOT EDIT IT.
%%
%%------------------------------------------------------------

-module('TimeBase_UtcT').
-ic_compiled("4_4_3").


-include("TimeBase.hrl").

-export([tc/0,id/0,name/0]).



%% returns type code
tc() -> {tk_struct,"IDL:omg.org/TimeBase/UtcT:1.0","UtcT",
                   [{"time",tk_ulonglong},
                    {"inacclo",tk_ulong},
                    {"inacchi",tk_ushort},
                    {"tdf",tk_short}]}.

%% returns id
id() -> "IDL:omg.org/TimeBase/UtcT:1.0".

%% returns name
name() -> "TimeBase_UtcT".


