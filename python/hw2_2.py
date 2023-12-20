
import pandas as pd

df = pd.read_csv("./data/edu_bigdata_imp1.csv",encoding="big5",low_memory=False)

df_filtered = df[df["PseudoID"]==281]
df_filtered = df_filtered[df_filtered["dp001_prac_score_rate"]==100]

print(len(df_filtered))