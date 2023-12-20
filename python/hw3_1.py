
import pandas as pd

df = pd.read_csv("./data/edu_bigdata_imp1.csv",encoding="big5",low_memory=False)

df_filtered = df[df["PseudoID"]==71]
df_filtered = df_filtered[df_filtered["dp001_record_plus_view_action"]=="paused"]

print(len(df_filtered))